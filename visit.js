// Armazena as visitas em uma lista
let visits = JSON.parse(localStorage.getItem("visits")) || [];

// Função para marcar uma nova visita
function scheduleVisit() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const property = document.getElementById("property").value;
    const date = document.getElementById("date").value;

    if (!name || !email || !property || !date) {
        alert("Preencha todos os campos!");
        return;
    }

    const visit = { name, email, property, date };
    visits.push(visit);
    localStorage.setItem("visits", JSON.stringify(visits));

    alert("Visita marcada com sucesso!");
    document.getElementById("visitForm").reset();
}

// Função para exibir as visitas agendadas na página "Consultar Visitas"
function displayVisits() {
    const visitsList = document.getElementById("visitsList");

    if (visits.length === 0) {
        visitsList.innerHTML = "<p>Nenhuma visita agendada.</p>";
        return;
    }

    visitsList.innerHTML = "";

    visits.forEach((visit, index) => {
        const visitDiv = document.createElement("div");
        visitDiv.classList.add("visit-item");

        visitDiv.innerHTML = `
            <p><strong>Nome:</strong> ${visit.name}</p>
            <p><strong>Email:</strong> ${visit.email}</p>
            <p><strong>Imóvel:</strong> ${visit.property}</p>
            <p><strong>Data:</strong> ${visit.date}</p>
            <button onclick="deleteVisit(${index})">Excluir</button>
            <hr>
        `;

        visitsList.appendChild(visitDiv);
    });
}

// Função para excluir uma visita agendada
function deleteVisit(index) {
    visits.splice(index, 1);
    localStorage.setItem("visits", JSON.stringify(visits));
    displayVisits();
}

// Exibe as visitas ao carregar a página "Consultar Visitas"
if (document.getElementById("visitsList")) {
    displayVisits();
}
