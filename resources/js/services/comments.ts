import { Comment, CommentPayload } from "@/types/comment";

export const createComment = async (payload: CommentPayload): Promise<Comment> => {
  const res = await fetch(route("api.articles.comments.store", payload.article_id), {
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