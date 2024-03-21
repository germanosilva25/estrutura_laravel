
// var url = `${window.location.hostname}`
// console.log('url: ' + url);
// if(url.includes('localhost'))
//   url = 'http://localhost/domvillage/app/public'
// else
//   url = 'https://app.domvillage.com.br/public'
//console.log('url depois: ' + url);


//url = ''




$.ajax({
    url: `${base_url}/menusss`,
    //data: {"_token": "{{ csrf_token() }}"},
    //data: formData,
    type: 'get',
    success: function (response) {

        if (response) {
            for (var valores of response) {
                console.log(valores)
                $('.navbar-nav').append(`
                    <li class="nav-item">
                        <a class="nav-link" href="${base_url}/${valores.chave}"><i class="${valores.icone}"></i> ${valores.valor}</a>
                    </li>
                `)
            }
        }
    }
})



var menu = `
    <div class="container-fluid">
    <a class="navbar-brand" href="${base_url}/presenca"><img src="${base_url}/images/logo.png"/ height="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">




        </ul>
    </div>
    </div>
    `
var menu = `
        <aside id="sidebar" class="sidebar">
        <nav class="navbar">
            <ul class="navbar-nav sidebar-nav" id="sidebar-nav">

        </div>

            </ul>

    </aside>
    `
    // var menu = `
    // <div class="container-fluid">
    //     <div class="row flex-nowrap">
    //         <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    //             <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    //                 <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    //                     <span class="fs-5 d-none d-sm-inline">Menu</span>
    //                 </a>
    //                 <ul class="navbar-nav nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
    //                 </ul>
    //             </div>
    //         </div>
    //     </div>
    // </div>
    // `

    // $('nav').html('menu')

/*
function checkIfLoggedIn()
{
if(sessionStorage.getItem('myUserEntity') == null){
    //Redirect to login page, no user entity available in sessionStorage
console.log('logged out')
alert('Você não está logado!')
window.location.href='https://vdepfsf6gohzg0uszvor4w.on.drv.tw/site/';

} else {
console.log('logged in')

}
}

$(document).ready(function(){
    checkIfLoggedIn()
    initClient()
})
*/

