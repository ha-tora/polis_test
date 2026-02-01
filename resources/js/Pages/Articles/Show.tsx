import { CommentCard } from "@/Components/Comment/CommentCard";
import { ArticleShow } from "@/Components/Article/ArticleShow";
import { MainLayout } from "@/Layouts/MainLayout";
import { Article } from "@/types/article";
import { Comment, CommentPayload } from "@/types/comment";
import { CommentForm } from "@/Components/Comment/CommentForm";
import { useState } from "react";
import { createComment } from "@/services/comments";
import { fetchArticle } from "@/services/articles";

interface ArticleShowPageProps {
  article: Article;
}

export default function ArticleShowPage({article}: ArticleShowPageProps) {
  const [comments, setComments] = useState<Comment[]>(article.comments || []);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');

  const handleSubmit = async (data: CommentPayload) => {
    try {
      setLoading(true);
      await createComment(data);
      setComments((await fetchArticle(article.id)).comments);
    } catch (e) {
      console.log(e);
      setError("Не удалось создать комментарий");
    } finally {
      setLoading(false);
    }
  };

  return (
    <MainLayout>
      <ArticleShow article={article} />

      <section className="space-y-6">
        <h2 className="text-2xl font-semibold">
          Комментарии ({comments.length})
        </h2>

        <CommentForm
          onSubmit={handleSubmit}
          loading={loading}
          article_id={article.id}
        />

        {loading && (
          <div className="flex justify-center py-20 text-lg">Загрузка…</div>
        )}

        {error && (
          <div className="flex justify-center py-20 text-red-500">{error}</div>
        )}

        <div className="space-y-4">
          {comments.map((comment: Comment) => (
            <CommentCard
              key={comment.id}
              comment={comment}
            />
          ))}
        </div>
      </section>
    </MainLayout>
  );
}
