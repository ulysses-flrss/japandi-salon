document.addEventListener("DOMContentLoaded", function () {

    let $submit_login = document.querySelector("#submit_login");
    ($submit_login)?$submit_login.addEventListener("click", loginAlerts):null;

    let $button_logout = document.querySelector("#button_logout");
    ($button_logout)?$button_logout.addEventListener("click", logoutAlert):null;

    let $table1_button = document.querySelector("#table1_button");
    ($table1_button)?$table1_button.addEventListener("click", changeTable):null;

    let $table2_button = document.querySelector("#table2_button");
    ($table2_button)?$table2_button.addEventListener("click", changeTable):null;

    let $table3_button = document.querySelector("#table3_button");
    ($table3_button)?$table3_button.addEventListener("click", changeTable):null;

    let $select_button = document.querySelector("#select_button");
    ($select_button)?$select_button.addEventListener("change", selectButton):null;
    

    function selectButton (e) {
        console.log(document.querySelector("#correo-input").attributes)
            
        if (e.target.value == 3) { // Cliente
            document.querySelectorAll(".recepcion-div").forEach(function (element) {
                element.style.display = "none";
                document.querySelector("#correo-input").removeAttribute("required",)
                document.querySelector("#password-input").removeAttribute("required",)
                document.querySelector("#submit-button").value = "Registrar Cliente"

                document.querySelector(".form-container").style.gridTemplateColumns = "20% 20%"
                document.querySelector(".select-container").style.gridColumn = "1 / 3"
                document.querySelector("#submit-container").style.gridColumn = "1 / 3"
            })
        } else { // Recepcionista
            document.querySelectorAll(".recepcion-div").forEach(function (element) {
                element.style.display = "grid";
                document.querySelector("#correo-input").setAttribute("required", "true")
                document.querySelector("#password-input").setAttribute("required", "true")
                document.querySelector("#submit-button").value = "Registrar Recepcionista"

                document.querySelector(".form-container").style.gridTemplateColumns = "20% 20% 20%"
                document.querySelector(".select-container").style.gridColumn = "1 / 4"
                document.querySelector("#submit-container").style.gridColumn = "1 / 4"
            })
        }
    }


    async function loginAlerts (e) {
        e.preventDefault();
        let correo = document.querySelector("#correo").value;
        let password = document.querySelector("#password").value;

                axios.post("/login", {"correo": correo, "password": password}).then(function (response) {
                console.log(response, correo, password, )
                
                if (response.data.codRol == 1) {
                    Swal.fire({
                        title: "¡Bienvenido!",
                        icon: "success",
                        text: "Has iniciado sesión como Administrador",
                        timer: 1500,
                        timerProgressBar: true,
                        showConfirmButton: false
                    }).then(function () {
                        window.location.href = "/admin";
                    });
                } else if (response.data.codRol == 2) {
                    Swal.fire({
                        title: "¡Bienvenido!",
                        icon: "success",
                        text: "Has iniciado sesión como Recepcionista",
                        timer: 1500,
                        timerProgressBar: true,
                        showConfirmButton: false
                    }).then(function () {
                        window.location.href = "/recepcionista";
                    });
                } else {
                    if (correo == "" || password == "") {
                        Swal.fire({
                            title: "¡Advertencia!",
                            icon: "warning",
                            text: "Ningun campo puede quedar vacío",
                            timer: 1000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.href = "/login";
                        });
                    } else {
                        Swal.fire({
                            title: "¡Error!",
                            icon: "error",
                            text: "Credenciales incorrectas",
                            timer: 1000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.href = "/login";
                        });
                    }
                }
            })
    }

    async function  logoutAlert(e) {
        e.preventDefault();
        axios.get("/logout").then(function (response) {
            Swal.fire({
                title: "¿Desea cerrar sesión?",
                icon: "question",
                text: "Se cerrará la sesión actual",
                timerProgressBar: true,
                showConfirmButton: true,
                showCancelButton: true,
            }).then(function (result) {
                if (result.isConfirmed)
                    window.location.href = "/login";    
                    
            });
    })

    }  
    
    
    function changeTable (e) {

        console.log(window.location.pathname)
        switch (window.location.pathname){

            case "/admin/listUsuarios":
                console.log(e.target.id)
                if (e.target.id == "table1_button") {
                    document.querySelector("#table1").style.display = "block";
                    document.querySelector("#table1_button").classList.add("table-active");
                    document.querySelector("#table2").style.display = "none";
                    document.querySelector("#table2_button").classList.remove("table-active");

                } else {
                    document.querySelector("#table1").style.display = "none";
                    document.querySelector("#table1_button").classList.remove("table-active");
                    document.querySelector("#table2").style.display = "block";
                    document.querySelector("#table2_button").classList.add("table-active");
                }
                break;

            case "/admin/listReservaciones":
            case "/recepcionista/listReservaciones":

                if (e.target.id == "table1_button") {
                    document.querySelector("#table1").style.display = "block";
                    document.querySelector("#table1_button").classList.add("table-active");
                    document.querySelector("#table2").style.display = "none";
                    document.querySelector("#table2_button").classList.remove("table-active");
                    document.querySelector("#table3").style.display = "none";
                    document.querySelector("#table3_button").classList.remove("table-active");

                } else if (e.target.id == "table2_button") {
                    document.querySelector("#table1").style.display = "none";
                    document.querySelector("#table1_button").classList.remove("table-active");
                    document.querySelector("#table2").style.display = "block";
                    document.querySelector("#table2_button").classList.add("table-active");
                    document.querySelector("#table3").style.display = "none";
                    document.querySelector("#table3_button").classList.remove("table-active");
                } else {
                    document.querySelector("#table1").style.display = "none";
                    document.querySelector("#table1_button").classList.remove("table-active");
                    document.querySelector("#table2").style.display = "none";
                    document.querySelector("#table2_button").classList.remove("table-active");
                    document.querySelector("#table3").style.display = "block";
                    document.querySelector("#table3_button").classList.add("table-active");
                }
            break;

        }
    }
    

});