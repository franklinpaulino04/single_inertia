import * as yup from "yup";

export const userSchema = yup.object({
    name: yup.string().required().label('Name'),
    email: yup.string().email().required().label('Email'),
    first_name: yup.string().required().label('First Name'),
    last_name: yup.string().required().label('Last Name'),
    phone: yup.string().required().label('Phone'),
    avatar: yup.string().required().label('Avatar'),
})
