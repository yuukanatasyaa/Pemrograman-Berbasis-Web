class Fibonacci {
    constructor(n) {
        this.n = n;
    }

    output() {
        let result = [];
        let fn = 1;
        let fn_1 = 1;
        let fn_2 = 0;

        for (let i = 1; i <= this.n; i++) {
            result.push(fn);
            fn = fn_1 + fn_2;
            fn_2 = fn_1;
            fn_1 = fn;
        }

        return result;
    }

    printTriangle() {
        let sequence = this.output();
        for (let i = 1; i <= this.n; i++) {
            console.log(sequence.slice(0, i).join(" "));
        }
    }
}

const data = new Fibonacci(10);
data.printTriangle();