import './bootstrap';

const sayHello = () => {
  console.log("Hello");
};

document.getElementById('app').innerHTML = '<span style="background-color:red;">Hello World</span>';
sayHello();

