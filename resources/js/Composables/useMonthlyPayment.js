import {computed, isRef} from "vue";

export const useMonthlyPayment = (price, interestRate, duration) => {
    const principle = computed(() => {
        return isRef(price) ? price.value : price
    })
    const monthlyPayment = computed(() => {
        const monthlyInterest = (isRef(interestRate) ? interestRate.value : interestRate) / 100 / 12;
        const numberOfPaymentMonths = (isRef(duration) ? duration.value : duration) * 12;

        if (monthlyInterest === 0) {
            return principle.value / numberOfPaymentMonths;
        }

        const numerator = principle.value * monthlyInterest * Math.pow(1 + monthlyInterest, numberOfPaymentMonths);
        const denominator = Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1;

        return numerator / denominator;
    })

    const totalPaid = computed(() => {
        return (isRef(duration) ? duration.value : duration) * 12 * monthlyPayment.value;
    })

    const totalInterest = computed(() => totalPaid.value - principle.value);

    return {monthlyPayment, totalPaid, totalInterest}

}
