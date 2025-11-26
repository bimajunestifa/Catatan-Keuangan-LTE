function formatCurrency(amount: number, currencySymbol: string = 'Rp'): string {
    return `${currencySymbol}${amount.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`;
}

function formatDate(date: string | Date): string {
    const options: Intl.DateTimeFormatOptions = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(date).toLocaleDateString(undefined, options);
}

function formatPercentage(value: number): string {
    return `${value.toFixed(2)}%`;
}

export { formatCurrency, formatDate, formatPercentage };