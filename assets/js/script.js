document.addEventListener("DOMContentLoaded",()=>{
    const vali=new Vali()

    const tableData=document.querySelector(".table__data")

    const formPost=document.getElementById("form_post")
    const nombre=document.getElementById("nombre")
    const email=document.getElementById("email")
    const password=document.getElementById("password")

    const formPut=document.getElementById("form_put")
    const nombrePut=document.getElementById("nombre_put")
    const emailPut=document.getElementById("email_put")
    const passwordPut=document.getElementById("password_put")
    var id_usuario


    const getData=()=>{

        tableData.innerHTML=""

        $.ajax({
            url:`${url_main}api/user`,
            type:"get",
            success:(response)=>{
                //console.log(response)
                const data=JSON.parse(response)
    
                let count=1
    
                data.forEach(user=>{
                    tableData.innerHTML+=`
                        <tr class="tr__user" id="${user.id_usuario}">
                            <td>${count++}</td>
                            <td class="user__nombre">${user.nombre}</td>
                            <td>${user.email}</td>
                            <td>${user.password}</td>
                            <td><span class="span__edit"><i class="fa-solid fa-pen-to-square"></i></span></td>
                            <td><span class="span__delete"><i class="fa-solid fa-trash"></i></span></td>
                        </tr>
                    `
                })

                const spanEditAll=document.querySelectorAll(".span__edit")
                const spanDeleteAll=document.querySelectorAll(".span__delete")


                spanEditAll.forEach(spanEdit=>{

                    spanEdit.addEventListener("click",()=>{
                        id_usuario=spanEdit.closest(".tr__user").id
                        //console.log(id_usuario)

                        $.ajax({
                            url:`${url_main}api/user/${id_usuario}`,
                            type:"get",
                            success:(response)=>{
                                console.log(response)
                                const data=JSON.parse(response)

                                nombrePut.value=data.nombre
                                emailPut.value=data.email
                                passwordPut.value=data.password
                            }
                        })
                    })

                })


                spanDeleteAll.forEach(spanDelete=>{

                    spanDelete.addEventListener("click",()=>{
                        let tr_user=spanDelete.closest(".tr__user")
                        let tr_nombre=tr_user.querySelector(".user__nombre").innerText

                        id_usuario=tr_user.id

                        //console.log(id_usuario)
                        //console.log(tr_nombre)

                        if(confirm(`Deseas eliminar a ${tr_nombre}?`)){
                            $.ajax({
                                url:`${url_main}api/user/${id_usuario}`,
                                type:"delete",
                                success:(response)=>{
                                    console.log(response)
                                    const res=JSON.parse(response)

                                    if(res.result){
                                        getData()
                                    }
                                }
                            })
                        }
                    })

                })

                
            }
        })

    }

    getData()


    formPost.addEventListener("submit",(e)=>{

        e.preventDefault()
        vali.formStart()




        $.ajax({
            url:`${url_main}api/user`,
            type:"post",
            data:{
                nombre:nombre.value,
                email:email.value,
                password:password.value
            },
            success:(response)=>{
                console.log(response)
                const res=JSON.parse(response)

                if(res.result){
                    nombre.value=""
                    email.value=""
                    password.value=""

                    getData();
                }
            }
        })

    })

    formPut.addEventListener("submit",(e)=>{

        e.preventDefault()

        $.ajax({
            url:`${url_main}api/user/${id_usuario}`,
            type:"put",
            data:JSON.stringify({
                nombre:nombrePut.value,
                email:emailPut.value,
                password:passwordPut.value
            }),
            success:(response)=>{
                console.log(response)
                const res=JSON.parse(response)

                if(res.result){
                    nombrePut.value=""
                    emailPut.value=""
                    passwordPut.value=""

                    getData()
                }
            }
        })

    })
})