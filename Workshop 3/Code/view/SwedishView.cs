﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;

namespace BlackJack.view
{
    class SwedishView : IView, model.NewCardListener
    {
        private model.Game a_game;
        public void SetGame(model.Game game)
        {
            a_game = game;
        }
        public void DisplayWelcomeMessage()
        {
            System.Console.Clear();
            System.Console.WriteLine("Hej Black Jack Världen");
            System.Console.WriteLine("----------------------");
            System.Console.WriteLine("Skriv 'p' för att Spela, 'h' för nytt kort, 's' för att stanna 'q' för att avsluta\n");
        }
        public int GetInput()
        {
            return System.Console.In.Read();
        }

        public char WantToPlay()
        {
            return 'p';
        }
        public char WantToHit()
        {
            return 'h';
        }
        public char WantToStand()
        {
            return 's';
        }
        public char WantToQuit()
        {
            return 'q';
        }
        public void DisplayCard(model.Card a_card)
        {
            if (a_card.GetColor() == model.Card.Color.Hidden)
            {
                System.Console.WriteLine("Dolt Kort");
            }
            else
            {
                String[] colors = new String[(int)model.Card.Color.Count]
                    { "Hjärter", "Spader", "Ruter", "Klöver" };
                String[] values = new String[(int)model.Card.Value.Count] 
                    { "två", "tre", "fyra", "fem", "sex", "sju", "åtta", "nio", "tio", "knekt", "dam", "kung", "ess" };
                System.Console.WriteLine("{0} {1}", colors[(int)a_card.GetColor()], values[(int)a_card.GetValue()]);
            }
        }
        public void DisplayPlayerHand(IEnumerable<model.Card> a_hand, int a_score)
        {
            DisplayHand("Spelare", a_hand, a_score);
        }
        public void DisplayDealerHand(IEnumerable<model.Card> a_hand, int a_score)
        {
            DisplayHand("Croupier", a_hand, a_score);
        }
        public void DisplayGameOver(bool a_dealerIsWinner)
        {
            System.Console.Write("Slut: ");
            if (a_dealerIsWinner)
            {
                System.Console.WriteLine("Croupiern Vann!");
            }
            else
            {
                System.Console.WriteLine("Du vann!");
            }
        }

        private void DisplayHand(String a_name, IEnumerable<model.Card> a_hand, int a_score)
        {
            System.Console.WriteLine("{0} Har: ", a_name);
            foreach (model.Card c in a_hand)
            {
                DisplayCard(c);
            }
            System.Console.WriteLine("Poäng: {0}", a_score);
            System.Console.WriteLine("");
        }
        public void CardWasDealt(model.Player player)
        {
            Thread.Sleep(1000);
            DisplayWelcomeMessage();
            DisplayDealerHand(a_game.GetDealerHand(), a_game.GetDealerScore());
            DisplayPlayerHand(a_game.GetPlayerHand(), a_game.GetPlayerScore());
        }
    }
}