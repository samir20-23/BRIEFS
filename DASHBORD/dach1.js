
let checkbox = document.getElementById("checkbox");
let navleftbtn = document.getElementById("navleftbtn");
let x=0;
checkbox.addEventListener("click",function(){
    x = x ===0 ? 1 : 0;
    if(x==1){
    navleftbtn.style.display="none";
     
    }else{
    navleftbtn.style.display="block";
    navleftbtn.setAttribute("style","animation: dabands 2s linear reverse;");


    }
    
  })


//btns    
    
    let Dashboard = document.getElementById("Dashboard");
    let Leaderboard = document.getElementById("Leaderboard");
    let Order = document.getElementById("Order");
    let Priducts = document.getElementById("Priducts");
    let Reportt = document.getElementById("Report");
    let Message = document.getElementById("Message");
    let Settings = document.getElementById("Settings");
    let SignOut = document.getElementById("SignOut");

    let navbtn0 = document.getElementsByClassName("navbtn")[0];
    let navbtn1 = document.getElementsByClassName("navbtn")[1];
    let navbtn2 = document.getElementsByClassName("navbtn")[2];
    let navbtn3 = document.getElementsByClassName("navbtn")[3];
    let navbtn4 = document.getElementsByClassName("navbtn")[4];
    let navbtn5 = document.getElementsByClassName("navbtn")[5];
    let navbtn6 = document.getElementsByClassName("navbtn")[6];
    let navbtn7 = document.getElementsByClassName("navbtn")[7];

   


Dashboard.addEventListener("click",function(){ 
    navbtn1.setAttribute("style","");
    navbtn2.setAttribute("style","");
    navbtn3.setAttribute("style","");
    navbtn4.setAttribute("style","");
    navbtn5.setAttribute("style","");
    navbtn6.setAttribute("style","");
    navbtn7.setAttribute("style","");
     Dashboard.setAttribute("style","width:80%;position: relative;right: 39%;background: rgb(154, 149, 244);")
 
})
Leaderboard.addEventListener("click",function(){
    navbtn0.setAttribute("style","");
    navbtn2.setAttribute("style","");
    navbtn3.setAttribute("style","");
    navbtn4.setAttribute("style","");
    navbtn5.setAttribute("style","");
    navbtn6.setAttribute("style","");
    navbtn7.setAttribute("style","");
    Leaderboard.setAttribute("style","width:80%;position: relative;right: 39%;background: rgb(154, 149, 244);")
})
Order.addEventListener("click",function(){
    navbtn0.setAttribute("style","");
    navbtn1.setAttribute("style","");
    navbtn3.setAttribute("style","");
    navbtn4.setAttribute("style","");
    navbtn5.setAttribute("style","");
    navbtn6.setAttribute("style","");
    navbtn7.setAttribute("style","");
    Order.setAttribute("style","width:80%;position: relative;right: 39%;background: rgb(154, 149, 244);")
})
Priducts.addEventListener("click",function(){
    navbtn0.setAttribute("style","");
    navbtn1.setAttribute("style","");
    navbtn2.setAttribute("style","");
    navbtn4.setAttribute("style","");
    navbtn5.setAttribute("style","");
    navbtn6.setAttribute("style","");
    navbtn7.setAttribute("style","");
    Priducts.setAttribute("style","width:80%;position: relative;right: 39%;background: rgb(154, 149, 244);")
})
Reportt.addEventListener("click",function(){
    navbtn0.setAttribute("style","");
    navbtn1.setAttribute("style","");
    navbtn2.setAttribute("style","");
    navbtn3.setAttribute("style","");
    navbtn5.setAttribute("style","");
    navbtn6.setAttribute("style","");
    navbtn7.setAttribute("style","");
    Reportt.setAttribute("style","width:80%;position: relative;right: 39%;background: rgb(154, 149, 244);")
})
Message.addEventListener("click",function(){
    navbtn0.setAttribute("style","");
    navbtn1.setAttribute("style","");
    navbtn2.setAttribute("style","");
    navbtn3.setAttribute("style","");
    navbtn4.setAttribute("style","");
    navbtn6.setAttribute("style","");
    navbtn7.setAttribute("style","");
    Message.setAttribute("style","width:80%;position: relative;right: 39%;background: rgb(154, 149, 244);")
})
Settings.addEventListener("click",function(){
    navbtn0.setAttribute("style","");
    navbtn1.setAttribute("style","");
    navbtn2.setAttribute("style","");
    navbtn3.setAttribute("style","");
    navbtn4.setAttribute("style","");
    navbtn5.setAttribute("style","");
    navbtn7.setAttribute("style","");
    Settings.setAttribute("style","width:80%;position: relative;right: 39%;background: rgb(154, 149, 244);")
})
SignOut.addEventListener("click",function(){
    navbtn0.setAttribute("style","");
    navbtn1.setAttribute("style","");
    navbtn2.setAttribute("style","");
    navbtn3.setAttribute("style","");
    navbtn4.setAttribute("style","");
    navbtn5.setAttribute("style","");
    navbtn6.setAttribute("style","");
    SignOut.setAttribute("style","width:80%;position: relative;right: 39%;background: rgb(154, 149, 244);")
})