
class Node {
    constructor(product, prev = null, next = null) {
        this.product = product;
        this.prev = prev;
        this.next = next;
    }
}

class Product {
    constructor(id, name, price, quantity, image) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.quantity = quantity;
        this.image = image;
    }
}


class DoublyLinkedList {
    constructor() {
        this.head = null;
        this.tail = null;
        this.size = 0;
    }

    addProduct(product) {
        const newNode = new Node(product);
        if (this.size === 0) {
            this.head = newNode;
            this.tail = newNode;
        } else {
            this.tail.next = newNode;
            newNode.prev = this.tail;
            this.tail = newNode;
        }
        this.size++;
        this.saveToCache();
    }

    removeProduct(productId) {
        let current = this.head;
        while (current) {
            if (current.product.id === productId) {
                if (current.prev) current.prev.next = current.next;
                if (current.next) current.next.prev = current.prev;
                if (current === this.head) this.head = current.next;
                if (current === this.tail) this.tail = current.prev;
                this.size--;
                this.saveToCache();
                return true;
            }
            current = current.next;
        }
        return false;
    }

    findProduct(productId) {
        let current = this.head;
        while (current) {
            if (current.product.id === productId) {
                return current.product;
            }
            current = current.next;
        }
        return null;
    }

    getAllProducts() {
        const products = [];
        let current = this.head;
        while (current) {
            products.push(current.product);
            current = current.next;
        }
        return products;
    }

    saveToCache() {
        localStorage.setItem('shoppingCart', JSON.stringify(this.getAllProducts()));
    }

    loadFromCache() {
        const products = JSON.parse(localStorage.getItem('shoppingCart'));
        if (products) {
            products.forEach(product => this.addProduct(new Product(product.id, product.name, product.price, product.quantity, product.image)));
        }
    }
    clear() {
        this.head = null;
        this.tail = null;
        localStorage.removeItem('shoppingCart');
    }
}


document.addEventListener('livewire:init', function () {
    Livewire.on('productAdded', product => {
        // console.log(product) producto es un Array...
        const cart = new DoublyLinkedList();
        console.log('Se ejecuta el evento de livewire');
        cart.loadFromCache();
        const newProduct = new Product(product[0].id, product[0].name, product[0].price, product[0].quantity, product[0].image);
        cart.addProduct(newProduct);
        cart.saveToCache();
        console.log(newProduct)
        // sendCartToServer(cart);
    });
});

// const sendCartToServer = async (cart) => {
//     const response = await fetch('/cart', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//         },
//         body: JSON.stringify({ cart: cart.getAllProducts() })
//     });
//     const data = await response.json();
//     console.log(data);
// };

console.log('Probando el carrito de compras');































// const cart = new DoublyLinkedList();
// cart.loadFromCache();

// // Agregamos un producto uwu
// const newProduct = new Product(1, "Producto A", 100, 2);
// cart.addProduct(newProduct);

// // Eliminanado un producto owo
// cart.removeProduct(1);

// // Obtener todos los productos
// const allProducts = cart.getAllProducts();
// console.log(allProducts);

// // Enviar datos al servidor de laravel
// const sendCartToServer = async (cart) => {
//     // Enviar el carrito al controlador de php en caso de usar la base de datos (Usuario logeado)
//     const response = await fetch('/cart', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//         },
//         body: JSON.stringify({ cart: cart.getAllProducts() })
//     });
//     const data = await response.json();
//     console.log(data);
// };

// sendCartToServer(cart);

// document.addEventListener('DOMContentLoaded', () => {
//     cart.loadFromCache();
//     // Aqui vamos a poner para actualizar la interfaz al agregar un producto al carrito
// });
