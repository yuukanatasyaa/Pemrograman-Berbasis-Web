let aritmatikaAngka1, operatorAritmatika, aritmatikaAngka2, hasilOperatorAritmatika;

document.getElementById(`buttonAritmatika`).onclick = function() {
    // input
    aritmatikaAngka1 = document.getElementById(`aritmatikaAngka1`).valueAsNumber;
    aritmatikaAngka2 = document.getElementById(`aritmatikaAngka2`).valueAsNumber;
    operatorAritmatika = document.getElementById(`operatorAritmatika`).value;
    console.log(aritmatikaAngka1);
    console.log(aritmatikaAngka2);
    console.log(operatorAritmatika);

    // operasi
    hasilOperatorAritmatika = eval(aritmatikaAngka1 + operatorAritmatika + aritmatikaAngka2);

    // output
    document.getElementById("hasilOperatorAritmatika").textContent = hasilOperatorAritmatika;
}