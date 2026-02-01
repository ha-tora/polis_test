import { ArticleItem } from "../types/article";

export const fetchArticles = async (): Promise<ArticleItem[]> => {
  const res = await fetch(route('api.articles.index'));
  if (!res.ok) throw new Error("Ошибка загрузки");
  
  const { data } = await res.json();
  return data;
};