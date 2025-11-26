export interface Transaction {
    id: string;
    description: string;
    amount: number;
    date: string;
    categoryId: string;
}

export interface Category {
    id: string;
    name: string;
}

export interface User {
    id: string;
    name: string;
    email: string;
}