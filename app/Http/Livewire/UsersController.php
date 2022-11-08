<?php

namespace App\Http\Livewire;

use App\Models\Sale as ModelsSale;

use Spatie\Permission\Models\Role;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;

class UsersController extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name,$phone,$email,$status,$image,$password,$selected_id,$fileLoaded,$profile;
    public $pageTitle, $componentName, $search;
    private $pagination = 3;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Usuarios';
        $this->status = 'Elegir';
    }

    public function render()
    {
        if(strlen($this->search) > 0)
            $data = User::where('name','like','%' . $this->search . '%')
            ->select('*')->orderBy('name','asc')->paginate($this->pagination);
        else
            $data = User::select('*')->orderBy('name','asc')->paginate($this->pagination);

        return view('livewire.users.component',[
            'data' => $data,
            'roles' => Role::orderBy('name','asc')->get() 
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->phone = '';
        $this->image = '';
        $this->search = '';
        $this->status = 'Elegir';
        $this->selected_id = 0;
        $this->resetValidation(); // resetValidation para quitar los smg Rojos
        $this->resetPage(); // regresa la pagina
    }

    public function edit(User $user)
    {
        $this->selected_id = $user->id;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->profile = $this->profile;
        $this->status = $user->status;
        $this->email = $user->email;
        $this->password = '';

        $this->emit('show-modal', 'open!');
    }

    protected $listeners = [
        'deleteRow' => 'destroy',
        'resetUI' => 'resetUI'
    ];

    public function Store()
    {
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'status' => 'required|not_in:Elegir',
            'profile' => 'required|not_in:Elegir',
            'password' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'ingresa el nombre',
            'name.min' => 'el nombre del usuario debe tener al menos 3 caracteres',
            'email.required' => 'ingresa el correo',
            'email.email' => 'ingresa un correo valido',
            'email.unique' => 'el email ya exite en sistema',
            'status.required' => 'seleccione el estatus del usuario',
            'status.not_in' => 'selcciona el status',
            'profile.required' => 'seleccione el perfil/role del usuario',
            'profile.not_in' => 'selcciona un perfil/role didtinto a elegir',
            'password.required' => 'ingresa el password',
            'password.min' => 'el password debe tener al menos 3 caracteres'
        ];

        $this->validate($rules, $messages);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'profile' => $this->profile,
            'password' => bcrypt($this->password)
        ]);

        $user->syncRoles($this->profile);

        if($this->image){
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/users', $customFileName);
            $user->image = $customFileName;
            $user->save();
        }

        $this->resetUI();
        $this->emit('user-added','Usuario Registrado');
    }

    public function Update()
    {
        $rules =[
            'email' => "required|email|unique:users,email,{$this->selected_id}",
            'name' => 'required|min:3',
            'status' => 'required|not_in:Elegir',
            'profile' => 'required|not_in:Elegir',
            'password' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'ingresa el nombre',
            'name.min' => 'el nombre del usuario debe tener al menos 3 caracteres',
            'email.required' => 'ingresa el correo',
            'email.email' => 'ingresa un correo valido',
            'email.unique' => 'el email ya exite en sistema',
            'status.required' => 'seleccione el estatus del usuario',
            'status.not_in' => 'selcciona el status',
            'profile.required' => 'seleccione el perfil/role del usuario',
            'profile.not_in' => 'selcciona un perfil/role didtinto a elegir',
            'password.required' => 'ingresa el password',
            'password.min' => 'el password debe tener al menos 3 caracteres'
        ];

        $this->validate($rules, $messages);

        $user = User::find($this->selected_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'profile' => $this->profile,
            'password' => bcrypt($this->password)
        ]);

        $user->syncRoles($this->profile);

        if($this->image)
        {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/users', $customFileName);
            $imageTemp = $user->image;

            $user->image = $customFileName;
            $user->save();

            if($imageTemp != null){
                if(file_exists('storage/users/' . $imageTemp)){
                    unlink('storage/users/' . $imageTemp);
                }
            }
        }

        $this->resetUI();
        $this->emit('user-updated','Usuario Actualzado');
    }
 
    public function destroy(User $user)
    {
        if($user)
        {
            $sales = ModelsSale::where('user_id', $user->id)->count();
            if($sales > 0){
                $this->emit('user-withsales', 'No es posible eliminar el usuario porque tiene ventas registradas');
            }else{
                $user->delete();
                $this->resetUI();
                $this->emit('user-deleted', 'Usuario eliminado');
            }
        }        
    }
}
