import { formatDate } from "@/services/datetime";
import { Article } from "@/types/article";

interface ArticleShowProps {
  article: Article;
}

export const ArticleShow = ({ article }: ArticleShowProps) => {
  return (
    <article className="bg-white rounded-2xl shadow-md p-8">
      <h1 className="text-3xl font-bold mb-4">{article.title}</h1>

      {article.created_at && (
        <div className="text-sm text-gray-400 mb-6">
          {formatDate(article.created_at)}
        </div>
      )}

      <div className="prose max-w-none text-gray-800 whitespace-pre-wrap">
        {article.content}
      </div>
    </article>
  );
};