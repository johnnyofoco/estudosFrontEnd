window.onload = function(){
    
    /*

    //Varíaveis:

    var operacao = 1+1;
    var animal = {};

    animal.especie = 'Gato';
    animal.genero = 'Macho';
    animal.idade = '3 anos';
    animal.peso = '8 kg';

    console.log('Resultado a operação é:'+ operacao + '.');
    console.log('');
    console.log('Tipo da variável animal é: '+typeof(animal) + '.');
    console.log('');
    console.log('############# DADOS DO OBJETO ################');
    
    console.log('Especie: '+ animal.especie);
    console.log('Especie: '+ animal.genero);
    console.log('Especie: '+ animal.idade);
    console.log('Especie: '+ animal.peso);

    //Condicionais:

    var nome = 'Pedro';

    if (nome == 'João'){
        alert("Condição verdadeira!");
    }
    else if(nome == 'Maria'){
        alert("Condição else If");
    }
    else{
        alert("Nenhum nome corresponde ao esperado!");
    }
    

    //Laços de repetição:

    var contador = 0;
    while(contador < 10){
        console.log("Olá mundo número: "+  contador);
        contador ++;
        
    }
    console.log('Fim');

    for(var numero = 0; numero < 10; numero++){
        console.log('Olá mundo! nº: '+ numero);
    }

    do{
        console.log("Checando os nomes... "+ nome);
        nome = 'João'
    }while(nome == 'João');
    */

    // Funções

    function somar(num1, num2){
          return num1 + num2; 
    }

     console.log(somar(-2.55,1));

     var umaFuncao = function(){
         console.log('Minha função através da variável');
     };

     console.log(typeof(umaFuncao));

     var obj = { 'tipo':'Cachorro','nome':'Mike', 'idade':4, 'acao':function(){
         console.log('Au au au');
     }};

     console.log(obj.tipo);
     console.log(obj.nome);
     console.log(obj.idade);
     obj.acao();


     //Switch case

     var teste = "Algum Valo";

     switch(teste)
     {
        case "Algum Valor":
             alert("Opa!");
        break;
        case "Algum Valo":
             alert("Vixi!");            
        break;
     }

}