import { useState } from "react";
import { router } from "@inertiajs/react";
import { createArticle } from "@/services/articles";
import { ArticlePayload } from "@/types/article";
import { MainLayout } from "@/Layouts/MainLayout";
import { ArticleForm } from "@/Components/Article/ArticleFrom";

export default function CreateArticlePage() {
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');

  const handleSubmit = async (data: ArticlePayload) => {
    try {
      setLoading(true);
      const article = await createArticle(data);
      router.visit(route('articles.index'));
    } catch {
      setError("Не удалось создать статью");
    } finally {
      setLoading(false);
    }
  };

  return (
    <MainLayout>
      <h1 className="text-3xl font-bold mb-8">Новая статья</h1>

      {error && (
        <div className="mb-4 text-red-500">
          {error}
        </div>
      )}

      <ArticleForm onSubmit={handleSubmit} loading={loading} />
    </MainLayout>
  );
}
