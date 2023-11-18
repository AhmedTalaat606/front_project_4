// var NameSgin = document.getElementById('NameS')
// var EamilSgin = document.getElementById('EmailS')
// var PassSgin = document.getElementById('PasswordS')

// var content =[] ;



// function AddUser() {
//     var uesr ={
//         name1:  NameSgin.Value,
//         Eamil1: EamilSgin.Value,
//         pass1: PassSgin.Value,
//     }

//     content.push(uesr)




// }

// function Display() {


//     AddUser()

//     console.log(content)

// }



// // function clear() {
// //     NameSgin.value = "";
// //     EamilSgin.value = "";
// //     PassSgin.value = ""
// // }

var name1 = document.getElementById("NameS")
var Eamil1 = document.getElementById("EmailS")
var PassSgin = document.getElementById("PasswordS")
var Eamil2 = document.getElementById("Emaillog")
var Passlogin = document.getElementById("passwordlog")




var UserContainer;
if (localStorage.getItem('user') != null) {
    UserContainer = JSON.parse(localStorage.getItem('user'));

}

else {
    var UserContainer = [];


}



function addUser() {

    
    
    var User = {
        userName: name1.value,
        uesrEamil: Eamil1.value,
        uesrpass: PassSgin.value,

    }

    UserContainer.push(User)
    localStorage.setItem('user', JSON.stringify(UserContainer)),
        document.getElementById('Success').innerHTML = 'Success';
    clear()








}

function clear() {
    name1.value = "";
    Eamil1.value = "";
    PassSgin.value = "";

}


    


function login() {

    var EamilLodin = Eamil2.value;
    var passlogin = Passlogin.value;


    

for (let i = 0; i < UserContainer.length; i++) {
    if (UserContainer[i].uesrEamil == EamilLodin && UserContainer[i].uesrpass == passlogin) {
            

           


        location.replace(  location.hostname + 'page2.html')
        
        
        


    }
    else {
        document.getElementById('incorrect').innerHTML = '<span class="p-2 text-danger">incorrect email or password</span>'
    }
 
    
}
    
       
    }



    document.getElementById('welcome').innerHTML = "Welcome " + UserContainer[0].userName

    
    function logout() {
        localStorage.removeItem('user')
    }