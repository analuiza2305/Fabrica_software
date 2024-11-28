
document.getElementById("cep").addEventListener("blur", function() {
    document.getElementById("cep").addEventListener("blur", function() {
        const cep = this.value.replace(/\D/g, ''); 
    
        if (cep.length === 8) { 
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Erro na requisição");
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.erro) {
                        alert("CEP não encontrado.");
                        clearAddressFields();
                    } else {
                        document.getElementById("logradouro").value = data.logradouro;
                        document.getElementById("bairro").value = data.bairro;
                        document.getElementById("cidade").value = data.localidade;
                        document.getElementById("estado").value = data.uf;
                    }
                })
                .catch(error => {
                    alert("Erro ao consultar o CEP. Tente novamente.");
                    console.error(error);
                    clearAddressFields();
                });
        } else {
            alert("CEP inválido. Deve conter 8 dígitos.");
            clearAddressFields();
        }
    });
    
    function clearAddressFields() {
        document.getElementById("logradouro").value = "";
        document.getElementById("bairro").value = "";
        document.getElementById("cidade").value = "";
        document.getElementById("estado").value = "";
    }
})

