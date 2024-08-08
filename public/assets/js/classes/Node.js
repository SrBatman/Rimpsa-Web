class Node {
    constructor(product, prev = null, next = null) {
        this.product = product;
        this.prev = prev;
        this.next = next;
    }
}

export default Node;