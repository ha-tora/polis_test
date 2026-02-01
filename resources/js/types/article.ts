export interface Article {
    id: number;
    title: string;
    content: string;
    created_at: string;
}

export interface ArticleItem {
    id: number;
    title: string;
    short_content: string;
    created_at: string;
}

export interface ArticlePayload {
    title: string;
    content: string;
}