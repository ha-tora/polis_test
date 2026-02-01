import { Header } from "@/Components/Header";
import { ReactNode } from "react";

interface MainLayoutProps {
  children: ReactNode;
}

export const MainLayout = ({ children }: MainLayoutProps) => {
  return (
    <div className="min-h-screen bg-gray-50 flex flex-col">
      <Header />

      <main className="flex-1 p-8">
        <div className="max-w-6xl mx-auto">{children}</div>
      </main>
    </div>
  );
};
