class Operaciones {
    constructor(numero1,numero2){
        this.numero1=numero1;
        this.numero2=numero2;

    }

     suma (){
        return this.numero1+this.numero2;

    }
 


}

function sumarNumeros (){
    var n1=parseInt(document.getElementById("txtNumero1").value);
    var n2=parseInt(document.getElementById("txtNumero2").value); 
    var objSuma = new Operaciones(n1,n2);

    alert("La suma es:  "+ objSuma.suma());
   }