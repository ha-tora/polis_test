import { CommentPayload } from "@/types/comment";
import { useState, FormEvent } from "react";

interface CommentFormProps {
  onSubmit: (data: CommentPayload) => void | Promise<void>;
  loading?: boolean;
  article_id: number;
}

export const CommentForm = ({ onSubmit, loading, article_id }: CommentFormProps) => {
  const [author_name, setAuthorName] = useState("");
  const [content, setContent] = useState("");

  const handleSubmit = async (e: FormEvent) => {
    e.preventDefault();
    await onSubmit({ 
      author_name, 
      content,
      article_id
    });
    setContent("");
  };

  return (
    <form
      onSubmit={handleSubmit}
      className="w-full bg-white rounded-2xl shadow-md p-6 space-y-4"
    >
      <h3 className="text-lg font-semibold">Оставить комментарий</h3>

      <input
        placeholder="Ваше имя"
        value={author_name}
        onChange={(e) => setAuthorName(e.target.value)}
        required
        className="w-full border rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none"
      />

      <textarea
        rows={4}
        placeholder="Текст комментария..."
        value={content}
        onChange={(e) => setContent(e.target.value)}
        required
        className="w-full border rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none resize-none"
      />

      <button
        type="submit"
        disabled={loading}
        className="bg-blue-600 text-white px-5 py-2 rounded-xl hover:bg-blue-700 disabled:opacity-50 transition"
      >
        {loading ? "Отправка..." : "Отправить"}
      </button>
    </form>
  );
};
