
class Node {
    constructor(product, prev = null, next = null) {
        this.product = product;
        this.prev = prev;
        this.next = next;
    }
}

class Product {
    constructor(id, name, price, quantity) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.quantity = quantity;
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
            products.forEach(product => this.addProduct(new Product(product.id, product.name, product.price, product.quantity)));
        }
    }

    clear() {
        this.head = null;
        this.tail = null;
        localStorage.removeItem('shoppingCart');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    console.log('Se ha cargado el DOM');
    const cart = new DoublyLinkedList();
    cart.loadFromCache();

    const cartItemsContainer = document.getElementById('cart-items-container');
    const cartTotalElement = document.getElementById('cart-total');

    const updateCartDisplay = () => {
        cartItemsContainer.innerHTML = '';
        const allProducts = cart.getAllProducts();
        let total = 0;

        allProducts.forEach(product => {
            console.log(product)
            const productElement = document.createElement('div');
            productElement.className = 'cart-item';
            productElement.innerHTML = `
                <div class="cart-item-details">
                    <h4>${product.name}</h4>
                    <p>Precio: $${parseFloat(product.price).toLocaleString('en-En')}</p>
                    <p>Cantidad: ${product.quantity}</p>
                </div>
            `;
            cartItemsContainer.appendChild(productElement);
            total += product.price * product.quantity;
        });

        cartTotalElement.textContent = total.toLocaleString('en-En');
    };

    updateCartDisplay();

    document.getElementById('checkout-button').addEventListener('click', () => {
        // Aquí puedes manejar el proceso de pago
        cart.clear();
        updateCartDisplay();
        alert('Gracias por tu compra! owo'); //eso de momento
        console.log('Aqui te toca ceja hacer los pagos owo')
    });
    document.getElementById('clear-cart-button').addEventListener('click', () => {
        cart.clear();
        updateCartDisplay();
        alert('Carrito vaciado owo!');
    });
});