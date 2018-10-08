
window.onload = function on() {

    var buttonName = 1;

    //создаем кнопку
    var tag = document.getElementById('button');

    tag.onclick = function () {
        var button = document.getElementById('buttons');

        var input=document.createElement('input');
        input.className = 'form-control button';
        input.type  = 'text';
        input.placeholder = 'Имя кнопки';
        input.name = 'button'+ buttonName;
        button.appendChild(input);
        buttonName++;

        //проверяем колличество кнопок
        var b=document.getElementById('1');
        var show = document.getElementsByClassName("button").length; //Считает сколько тегов
        document.forms['main'].number.value = show;

        return false;

    };



        //проверяем есть ли картинка
        var image =  document.getElementById('image');
        if($('#image').on('change',function inc () {
                maxCount = 200;
            })){
            var maxCount = 4088;
        }

        //выводим колличество символов в поле
        $("#counter").html(maxCount);
        $("#textArea").keyup(function() {

            var revText = this.value.length;
            if (this.value.length > maxCount)
            {
                this.value = this.value.substr(0, maxCount);
            }
            var cnt = (maxCount - revText);
            if(cnt <= 0){$("#counter").html('0');}
            else {$("#counter").html(cnt);}

        });









};








