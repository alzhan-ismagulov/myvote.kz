CKEDITOR.replace('text');

$('.delete').click(function(){
    var res = confirm('Подтвердите действие');
    if(!res) return false;
});

