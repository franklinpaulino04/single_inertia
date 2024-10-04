import * as yup from "yup";

export const authSchema = yup.object({
    email: yup.string().email().required().label('Email'),
    password: yup.string().required().label('Password'),
});
