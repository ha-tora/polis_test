import { formatDate } from "@/services/datetime";
import { Comment } from "@/types/comment";

interface CommentCardProps {
  comment: Comment
}

export const CommentCard = ({comment}: CommentCardProps) => {
  return (
    <div className="bg-white rounded-2xl shadow-sm p-5 border">
      <div className="flex items-center justify-between mb-2">
        <span className="font-semibold">{comment.author_name}</span>
        <span className="text-sm text-gray-400">{formatDate(comment.created_at)}</span>
      </div>

      <p className="text-gray-700 whitespace-pre-wrap">{comment.content}</p>
    </div>
  );
};
