<script>
    var listener = new window.keypress.Listener();

    // F9 Guardar
    listener.simple_combo("f9", function(){
        console.log('f9')
        livewire.emit('saveSale')
    })

    // F8 Pocicionar 
    listener.simple_combo("f8", function(){
        document.getElementById('hiddenTotal').value=''
        document.getElementById('cash').focus()
    })

    // F4 Cancelar 
    listener.simple_combo("f4", function(){
        var total = parseFloat(document.getElementById('hiddenTotal').value)
        if(total > 0){
            Confirm(0, 'clearCart', '¿SEGUR@ DE ELIMINAR EL CARRITO?')
        }else
        {
            noty('AGREGA PRODUCTOS A LA VENTA')
        }
    })
</script>

