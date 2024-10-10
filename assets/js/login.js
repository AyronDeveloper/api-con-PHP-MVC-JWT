document.addEventListener("DOMContentLoaded",()=>{

    const form=document.getElementById("form")
    const email=document.getElementById("email")
    const password=document.getElementById("password")


    form.addEventListener("submit",(e)=>{
        e.preventDefault()

        console.log(email.value)
        console.log(password.value)

        $.ajax({
            url:`${url_main}post/login`,
            type:"post",
            data:{
                email:email.value,
                password:password.value
            },
            success:(response)=>{
                console.log(response)

                const data=JSON.parse(response)

                if(data.result){

                    localStorage.setItem("token",data.token)
                    window.location.href=`${url_main}auth`
                }
            }
        })
    })

})