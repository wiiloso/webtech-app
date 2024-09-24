/* eslint-disable @typescript-eslint/no-explicit-any */
export interface Producto {
    status: boolean;
    message: string;
    datapro: datapro;
    id?: number
}

export interface datapro {
    pro_id: number;
    pro_nombre_producto: string;
    pro_cantidad: number;
    pro_precio: string;
    pro_costo_unitario: string;
    pro_destino: string;
    pro_estado: number;
    sbc_id: number;
    // "status": true,
    // "id_pro": 1,
    // "pro_nombre_producto": "Tripode Noganet NGT-045 Para Camaras",
    // "pro_cantidad": 171,
    // "pro_precio": "200.00",
    // "pro_costo_unitario": "190.00",
    // "pro_destino": null,
    // "pro_estado": 1,
    // "id_sbc": 2
}



export interface dataProducto {
    // pro_id, pro_cod, pro_detalle, pro_cantidad, pro_precio_unitario, pro_costo_unitario, pro_destino, pro_estado, sbc_id, mar_id, unm_id
    pro_id?: number;
    pro_cod: string;
    pro_detalle: string;
    pro_cantidad: number;
    pro_precio_unitario: string;
    pro_costo_unitario: string;
    pro_destino: string;
    pro_estado: number;
    sbc_id?: number;
    mar_id?: number;
    unm_id?: number;
}

export interface apiResultProducto {
    status: string;
    data: dataProducto[];
    message: string;
}

export interface apiResultFormato {
    status: boolean;
    data: Array<any>;
    // totalData: number;
  }
