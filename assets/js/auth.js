document.addEventListener("DOMContentLoaded",()=>{
    const nombre=document.getElementById("nombre")
    const logout=document.querySelector(".logout")

    const verifyAuth=()=>{
        $.ajax({
            url:`${url_main}post/auth`,
            type:"post",
            data:{token:localStorage.getItem("token")},
            success:(response)=>{
                console.log(response)

                const data=JSON.parse(response)

                if(data.result){
                    nombre.innerText=data.data.nombre
                }else{
                    
                    window.location.href=`${url_main}login`
                }
            }
        })
    }

    verifyAuth()


    logout.addEventListener("click",()=>{
        localStorage.removeItem("token")
        
        window.location.href=`${url_main}login`
    })

})