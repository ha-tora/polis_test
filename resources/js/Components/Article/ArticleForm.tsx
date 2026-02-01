import { ArticlePayload } from "@/types/article";
import { useState, FormEvent } from "react";

interface ArticleFormProps {
  onSubmit: (data: ArticlePayload) => Promise<void>;
  loading?: boolean;
}

export const ArticleForm = ({ onSubmit, loading }: ArticleFormProps) => {
  const [title, setTitle] = useState("");
  const [content, setContent] = useState("");

  const handleSubmit = async (e: FormEvent) => {
    e.preventDefault();
    await onSubmit({
      title,
      content,
    });
  };

  return (
    <form
      onSubmit={handleSubmit}
      className="bg-white rounded-2xl shadow-md p-6 space-y-5"
    >
      <div>
        <label className="block mb-2 font-medium">Заголовок</label>
        <input
          className="w-full border rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none"
          value={title}
          onChange={(e) => setTitle(e.target.value)}
          required
        />
      </div>

      <div>
        <label className="block mb-2 font-medium"></label>
        <textarea
          rows={4}
          className="w-full border rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none"
          value={content}
          onChange={(e) => setContent(e.target.value)}
          required
        />
      </div>

      <button
        type="submit"
        disabled={loading}
        className="bg-blue-600 text-white px-5 py-2 rounded-xl hover:bg-blue-700 disabled:opacity-50 transition"
      >
        {loading ? "Сохранение..." : "Создать статью"}
      </button>
    </form>
  );
};
