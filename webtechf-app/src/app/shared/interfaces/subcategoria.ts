export interface Subcategoria {
    // sbc_id, sbc_nombre, sub_estado, cat_id
    sbc_id: number;
    sbc_nombre: string;
    sub_estado: number;
    cat_id: number;
}

export interface apiResultSubcategoria {
    status: string;
    data: Subcategoria[];
    message: string;
}
