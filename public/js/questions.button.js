
window.onload = function on() {

    var buttonName = 1;

    //кнопка онклик
    var tag = document.getElementById('button');

    tag.onclick = function () {
        var button = document.getElementById('buttons');

        var input=document.createElement('input');
        input.className = 'form-control';
        input.type  = 'text';
        input.placeholder = 'button';
        input.name = 'имя'+ buttonName;
        button.appendChild(input);
        buttonName++;
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








