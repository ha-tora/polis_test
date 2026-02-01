import { ArticleCard } from "@/Components/Article/ArticleCard";
import { MainLayout } from "@/Layouts/MainLayout";
import { fetchArticles } from "@/services/articles";
import { ArticleItem } from "@/types/article";
import { useEffect, useState } from "react";

export default function ArticlesPage() {
  const [articles, setArticles] = useState<ArticleItem[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState('');

  useEffect(() => {
    loadArticles();
  }, []);

  const loadArticles = async () => {
    try {
      setLoading(true);
      const data = await fetchArticles();
      setArticles(data);
    } catch (e) {
      setError("Не удалось загрузить статьи");
    } finally {
      setLoading(false);
    }
  };

  if (loading)
    return (
      <div className="flex justify-center py-20 text-lg">Загрузка…</div>
    );

  if (error)
    return (
      <div className="flex justify-center py-20 text-red-500">{error}</div>
    );

  return (
    <MainLayout>
      <div className="min-h-screen bg-gray-50 p-8">
        <div className="max-w-5xl mx-auto">
          <h1 className="text-3xl font-bold mb-8">Статьи</h1>

          <div className="grid gap-6">
            {articles.map((article) => (
              <ArticleCard key={article.id} article={article} />
            ))}
          </div>
        </div>
      </div>
    </MainLayout>
  );
}