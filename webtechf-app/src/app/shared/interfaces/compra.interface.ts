export interface Compra {
    id?: number;
    status: boolean;
    message: string;
    data: DataCompra;
}

export interface DataCompra {
    ent_id?: number;
    ent_num_docu: string;
    ent_fecha: Date;
    ent_monto: number;
    prve_id?: number;   
}

export interface DataCompraDetalle {
    dte_id?: number;
    dte_costo_unitario: number;
    dte_cantidad: number;
    pro_id?: number;
    ent_id?: number; 
}