export interface Comment {
    id: number;
    author_name: string;
    content: string;
    created_at: string;
}

export interface CommentPayload {
    author_name: string;
    content: string;
    article_id: number;
}
