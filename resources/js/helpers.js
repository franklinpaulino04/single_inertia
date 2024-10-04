// import {useToast} from "primevue/usetoast";
//
// const toast = useToast();

const lifeTime = 3000;

export function ToastInfo(title, body) {
    toast.add({severity: 'info', summary: title, detail: body, life: lifeTime});
}

export function ToastError(title, body) {
    toast.add({severity: 'error', summary: title, detail: body, life: lifeTime});
}

export function ToastSuccess(title, body) {
    toast.add({severity: 'success', summary: title, detail: body, life: lifeTime});
}

export function ToastWarning(title, body) {
    toast.add({severity: 'warn', summary: title, detail: body, life: lifeTime});
}
