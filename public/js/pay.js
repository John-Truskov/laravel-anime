//Функция платёжной формы
function pay(el){
    if((el.ac.checked || el.pc.checked) && !(el.ac.checked && el.pc.checked)){
        sum = Number(el.sum.value);
        if(!isNaN(sum)){
            if(sum > 15000){
                error = "Не более 15000 руб.!";
            }
            else if(sum < 1){
                error = "Не менее 1 руб.!";
            }
            else{
                el.sum.value = sum.toFixed(2);
                el.submit();
            }
        }
        else{
            error = "Введите сумму!";
        }
    }
    else{
        error = "Выберите способ оплаты.";
    }
    if(error){
        try{
            document.getElementById("error").innerText = error;
        }
        catch(e){
            document.getElementById("error").textContent = error;
        }
    }else{
        document.getElementById("error").innerText = "";
    }
    return false;
}
//input для оплаты
var input = document.getElementById('sum');
if(typeof(input) != 'undefined' && input !== null){
    input.oninput = function(){
        input.value = input.value.substr(0,8).replace(/[^\d.]+/g, '').replace(/^([^\.]*\.)|\./g, '$1');
    }
}
