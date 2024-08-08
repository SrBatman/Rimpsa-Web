import Node from './Node.js';
import Product from './Product.js';

class DoublyLinkedList {
    constructor() {
        this.head = null;
        this.tail = null;
        this.size = 0;
    }

    addProduct(product) {
        let current = this.head;
        while (current) {
            if (current.product.id === product.id) {
                // Producto ya existe, aumentar cantidad
                current.product.quantity += product.quantity;
                this.saveToCache();
                return;
            }
            current = current.next;
        }

        // Producto no existe, agregarlo como nuevo
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
        const idToRemove = Number(productId); // Convertir a número si es necesario
        while (current) {
            if (current.product.id === idToRemove) {
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

    getAllProducts(node = this.head, productos = []) {
        if (!node) return productos;
        productos.push(node.product);
        return this.getAllProducts(node.next, productos);
    }

    saveToCache() {
        localStorage.setItem('shoppingCart', JSON.stringify(this.getAllProducts()));
    }

    loadFromCache() {
        const products = JSON.parse(localStorage.getItem('shoppingCart'));
        if (products) {
            products.forEach(product => this.addProduct(new Product(product.id, product.name, product.price, product.quantity, product.image, product.description, product.slug)));
        }
    }

    clear() {
        this.head = null;
        this.tail = null;
        localStorage.removeItem('shoppingCart');
    }
}

export default DoublyLinkedList;