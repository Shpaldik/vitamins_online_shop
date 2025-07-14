export interface Product{
    id: number;
    name: string;
    description: string;
    images: [];
    price: number;
    series: string;
    age_group: string;
    category: string;
    tablet_count: number;
    instruction_file?: string;
}