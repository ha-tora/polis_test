import { Article, ArticleItem, ArticlePayload } from "../types/article";

export const fetchArticles = async (): Promise<ArticleItem[]> => {
  const res = await fetch(route('api.articles.index'));
  if (!res.ok) throw new Error("Ошибка загрузки");
  
  const { data } = await res.json();
  return data;
};

export const fetchArticle = async (id: number): Promise<Article> => {
  const res = await fetch(route('api.articles.show', id));
  if (!res.ok) throw new Error("Ошибка загрузки");
  
  const { data } = await res.json();
  return data;
};

export const createArticle = async (payload: ArticlePayload): Promise<Article> => {
  const res = await fetch(route("api.articles.store"), {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(payload),
  });
  if (!res.ok) throw new Error();

  const { data } = await res.json();
  return data;
};