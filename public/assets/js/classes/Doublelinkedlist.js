import Node from './Node.js';
import Product from './Product.js';

class DoubleLinkedList {
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
}

export default DoubleLinkedList;