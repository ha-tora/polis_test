import { Link } from "@inertiajs/react";
import { ArticleItem } from "../../types/article";
import { formatDate } from "@/services/datetime";

interface ArticleCardProps {
  article: ArticleItem;
}

export const ArticleCard = ({ article }: ArticleCardProps) => {
  return (
    <div className="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
      <div className="flex justify-between items-start mb-3">
        <h2 className="text-xl font-semibold">{article.title}</h2>
        <span className="text-sm text-gray-400">
          {formatDate(article.created_at)}
        </span>
      </div>

      <p className="text-gray-600">{article.short_content}</p>

      <Link
        className="mt-4 text-blue-600 hover:underline"
        href={route('articles.show', article.id)}
      >
        Читать →
      </Link>
    </div>
  );
};