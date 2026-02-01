import { Link } from "@inertiajs/react";

export const Header = () => {
  return (
    <header className="bg-white border-b shadow-sm">
      <div className="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
        <Link
          href={route('articles.index')}
          className="text-2xl font-bold tracking-tight hover:opacity-80 transition"
        >
          Articles
        </Link>

        <Link
          href={route('articles.create')}
          className="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition"
        >
          + Добавить статью
        </Link>
      </div>
    </header>
  );
};
