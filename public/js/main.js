let scrol=document.getElementById("scrol");

onscroll=()=>{
    if(scrollY>=400) {
        scrol.style.display="block";
    }
    else {
        scrol.style.display="none";
    }
}
scrol.onclick=()=>{
    scroll ({
        top: 0,
        behavior: "smooth"
    })
}



