function add_product(id, items){
    let form=new FormData();
    form.append('product_id', id);
    form.append('count', items);
    let request_options={method: 'POST', body: form};
    fetch('https://pr-yanulyavichus.сделай.site/cart/create', request_options)
        .then(response=>response.text())
        .then(result=>{
            console.log(result)
            let title=document.getElementById('staticBackdropLabel');
            let body=document.getElementById('modalBody');
            if (result=='false')
            {
                title.innerText='Ошибка';
                body.innerHTML="<p>Ошибка добавления товара, вероятно, товар уже раскупили</p>"
            }
            else
            {
                title.innerText='Информационное сообщение';
                body.innerHTML="<p>Товар успешно добавлен в корзину</p>"
            }
            let myModal = new
            bootstrap.Modal(document.getElementById("staticBackdrop"), {});
            myModal.show();
        })
}

function test(cells)
{
   let a=cells;
   let product= this.parentNode//.parentNode.rows[1].value
   let i=0;
}