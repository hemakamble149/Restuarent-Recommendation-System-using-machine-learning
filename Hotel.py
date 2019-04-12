import os
import csv
import sys
import re

from surprise import Dataset
from surprise import Reader
from collections import defaultdict
import numpy as np

class Hotel:

    HotelID_to_name = {}
    name_to_HotelD = {}
    ratingsPath = 'C:/xampp/htdocs/Project/ml-latest-small/ratings.csv'
    hotelPath = 'C:/xampp/htdocs/Project/ml-latest-small/Hotels.csv'
    
    def loadHotelLatestSmall(self):

        # Look for files relative to the directory we are running from
        #os.chdir(os.path.dirname(sys.argv[0]))

        ratingsDataset = 0
        self.HotelID_to_name = {}
        self.name_to_HotelID = {}

        reader = Reader(line_format='user item rating timestamp ', sep=',', skip_lines=1)

        ratingsDataset = Dataset.load_from_file(self.ratingsPath, reader=reader)

        with open(self.hotelPath, newline='', encoding='ISO-8859-1') as csvfile:
                hotelReader = csv.reader(csvfile)
                next(hotelReader)  #Skip header line
                for row in hotelReader:
                    hotelID = int(row[0])
                    hotelName = row[1]
                    self.HotelID_to_name[hotelID] = hotelName
                    self.name_to_HotelID[hotelName] = hotelID


        return ratingsDataset

    def getUserRatings(self, user):
        userRatings = []
        hitUser = False
        with open(self.ratingsPath, newline='') as csvfile:
            ratingReader = csv.reader(csvfile)
            next(ratingReader)
            for row in ratingReader:
                userID = int(row[0])
                if (user == userID):
                    HotelId = int(row[1])
                    rating = float(row[2])
                    userRatings.append((HotelId, rating))
                    hitUser = True
                if (hitUser and (user != userID)):
                    break

        return userRatings

    def getPopularityRanks(self):
        ratings = defaultdict(int)
        rankings = defaultdict(int)
        with open(self.ratingsPath, newline='') as csvfile:
            ratingReader = csv.reader(csvfile)
            next(ratingReader)
            for row in ratingReader:
                HotelId= int(row[1])
                ratings[HotelId] += 1
        for HotelId, ratingCount in sorted(ratings.items(), key=lambda x: x[1], reverse=True):
            rankings[HotelId] = rank
            rank += 1
        return rankings
    
    def getHotelName(self, hotelID):
        if hotelID in self. HotelID_to_name:
            return self. HotelID_to_name[hotelID]
        else:
            return ""
        
    def getHotelId(self, movieName):
        if movieName in self.name_to_HotelId:
            return self.name_to_HotelId[movieName]
        else:
            return 0